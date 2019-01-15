package pt.ipleiria.estg.dei.amsi.myapplication.Modelo;

import android.content.Context;
import android.util.Log;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

import pt.ipleiria.estg.dei.amsi.myapplication.Adapter.ListaPratoDiaAdapter;
import pt.ipleiria.estg.dei.amsi.myapplication.listeners.PratoDiaListener;
import pt.ipleiria.estg.dei.amsi.myapplication.utils.PratoDiaJsonParser;

public class SingletonGestorPratoDia implements PratoDiaListener {
    private static SingletonGestorPratoDia INSTANCE = null;
    private ArrayList<PratoDia> listaPratoDias;
    private PratoDiaBDHelper pratoDiaBDHelper;

    private static RequestQueue volleyQueue;

    private String IP = "192.168.1.185";

    private String mUrlApiLivros = "http://" + IP + "/api/prato";
    private String mUrlApiLogin = "http://" + IP + "/site/login";

    private PratoDiaListener pratoDiaListener;

    public static synchronized SingletonGestorPratoDia getInstance(Context context){
        if (INSTANCE == null){
            INSTANCE = new SingletonGestorPratoDia(context);
            volleyQueue = Volley.newRequestQueue(context);
        }
        return INSTANCE;
    }

    public SingletonGestorPratoDia(Context context){
        listaPratoDias = new ArrayList<>();
        pratoDiaBDHelper = new PratoDiaBDHelper(context);

    }
    public PratoDia getPratoDia(long idPratoDia){
        for (PratoDia pratoDia: listaPratoDias){
            if (pratoDia.getId() == idPratoDia){
                return pratoDia;
            }
        }
        return null;
    }


    public void adicionarPratoDiaBD(PratoDia pratoDia){
        pratoDiaBDHelper.adicionarPratoDiaDB(pratoDia);
    }

    public void adicionarPratoDiaBD(ArrayList<PratoDia> listaPratoDias){
       removerPratoDiaBD();
       for (PratoDia pratoDia:listaPratoDias){
           adicionarPratoDiaBD(pratoDia);
       }
    }

    public void setPratoDiaListener(PratoDiaListener pratoDiaListener){
        this.pratoDiaListener = pratoDiaListener;
    }


    public void removerPratoDiaBD(long idPratoDia){
        PratoDia auxPratoDia = getPratoDia(idPratoDia);
        if (auxPratoDia != null){
            if (pratoDiaBDHelper.removePratoDiaDB(auxPratoDia.getId()))
                listaPratoDias.remove(auxPratoDia);
        }
    }

    public void removerPratoDiaBD(){
        pratoDiaBDHelper.removeAllPRatoDiaDB();
    }

    public void editarPratoDiaBD(PratoDia pratoDia){
        if (!listaPratoDias.contains(pratoDia))
            return;

        PratoDia auxPratoDia = getPratoDia(pratoDia.getId());
        auxPratoDia.setNomeProdutoPD(pratoDia.getNomeProdutoPD());
        auxPratoDia.setPrecoPD(pratoDia.getPrecoPD());
        auxPratoDia.setImgPD(pratoDia.getImgPD());

        if (pratoDiaBDHelper.editarPratoDiaDB(auxPratoDia))
            System.out.println("Prato Dia adicionado");
    }


    public void getAllPratoDiaAPI(final Context context, boolean isConnected){

        if (!isConnected){
            listaPratoDias = pratoDiaBDHelper.getAllPratoDiaDB();
            if (listaPratoDias != null){
                pratoDiaListener.onRefreshListaPratoDia(listaPratoDias);
            }
        }else {
            Toast.makeText(context, "Is connected" + isConnected, Toast.LENGTH_SHORT).show();
            JsonArrayRequest request = new JsonArrayRequest(Request.Method.GET, mUrlApiLivros, null, new Response.Listener<JSONArray>() {
                @Override
                public void onResponse(JSONArray response) {
                    Log.e("Resposta --> ", response.toString());
                    listaPratoDias = PratoDiaJsonParser.parserJsonPratoDia(response, context);
                    adicionarPratoDiaBD(listaPratoDias);
                }
            }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {

                }
            });
            volleyQueue.add(request);
        }
    }

    public void adicionarPratoDiaAPI(final PratoDia pratoDia, final Context context){
        StringRequest req = new StringRequest(Request.Method.POST, mUrlApiLivros, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                System.out.println("----> Resposta add post: " + response);
                if (pratoDiaListener != null)
                    pratoDiaListener.onUpdateListaPratoDiaBD(PratoDiaJsonParser.parserJsonPratoDia(response, context), 1);

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

            }
        })
        {
            @Override
            protected Map<String, String> getParams(){
                Map<String, String> params = new HashMap<>();
                params.put("token", "AMSI-Token");
                params.put("descricao", pratoDia.getNomeProdutoPD());
                params.put("precoPD", ""+ pratoDia.getPrecoPD());
                params.put("imgPD", pratoDia.getImgPD());

                return params;
            }
        };
        volleyQueue.add(req);
    }

    @Override
    public void onRefreshListaPratoDia(ArrayList<PratoDia> listaPratoDias){

    }

    @Override
    public void onUpdateListaPratoDiaBD(PratoDia pratoDia, int operacao){
        switch (operacao){
            case 1:
                adicionarPratoDiaBD(pratoDia);
                break;
            case 2:
                editarPratoDiaBD(pratoDia);
                break;
            case 3:
                removerPratoDiaBD(pratoDia.getId());
                break;
        }
    }
}
