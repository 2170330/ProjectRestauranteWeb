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

import pt.ipleiria.estg.dei.amsi.myapplication.listeners.BebidaListener;
import pt.ipleiria.estg.dei.amsi.myapplication.utils.BebidaJsonParser;

public class SingletonGestorBebida /*implements BebidaListener*/{
/*
    private static SingletonGestorBebida INSTANCEB = null;
    private ArrayList<Bebida> listaBebida;
    private BDHelper BDHelper;

    private static RequestQueue volleyQueue;

    private String IP = "192.168.43.169";

    private String mUrlApiLivros = "http://" + IP + "/api/prato";
    private String mUrlApiLogin = "http://" + IP + "/site/login";

    private BebidaListener bebidaListener;

    public static synchronized SingletonGestorBebida getInstance(Context context){
        if (INSTANCEB == null){
            INSTANCEB = new SingletonGestorBebida(context);
            volleyQueue = Volley.newRequestQueue(context);
        }
        return INSTANCEB;
    }

    public SingletonGestorBebida(Context context){
        listaBebida = new ArrayList<>();
        BDHelper = new BDHelper(context);

    }
    public Bebida getBebida(long idBebida){
        for (Bebida bebida: listaBebida){
            if (bebida.getId() == idBebida){
                return bebida;
            }
        }
        return null;
    }


    public void adicionarBebidaBD(Bebida bebida){
        BDHelper.adicionarBebidaDB(bebida);
    }

    public void adicionarBebidaBD(ArrayList<Bebida> listaBebida){
        removerBebidaBD();
        for (Bebida bebida:listaBebida){
            adicionarBebidaBD(bebida);
        }
    }

    public void setBebidaListener(BebidaListener bebidaListener){
        this.bebidaListener = bebidaListener;
    }


    public void removerBebidaBD(long idBebida){
        Bebida auxBebida = getBebida(idBebida);
        if (auxBebida != null){
            if (BDHelper.removePratoDB(auxBebida.getId()))
                listaBebida.remove(auxBebida);
        }
    }

    public void removerBebidaBD(){
        BDHelper.removeAllBebidaDB();
    }

    public void editarBebidaBD(Bebida bebida){
        if (!listaBebida.contains(bebida))
            return;

        Bebida auxBebida = getBebida(bebida.getId());
        auxBebida.setNomeBebida(bebida.getNomeBebida());
        auxBebida.setPrecoBebida(bebida.getPrecoBebida());
        auxBebida.setImgBebida(bebida.getImgBebida());
        auxBebida.setIdTipoBebida(bebida.getIdTipoBebida());

        if (BDHelper.editarBebidaDB(auxBebida))
            System.out.println("Bebida adicionada");
    }

    public void getAllBebidaAPI(final Context context, boolean isConnected){

        if (!isConnected){
            listaBebida = BDHelper.getAllBebidaDB();
            if (listaBebida != null){
                bebidaListener.onRefreshListaBebida(listaBebida);
            }
        }else {
            Toast.makeText(context, "Is connected" + isConnected, Toast.LENGTH_SHORT).show();
            JsonArrayRequest request = new JsonArrayRequest(Request.Method.GET, mUrlApiLivros, null, new Response.Listener<JSONArray>() {
                @Override
                public void onResponse(JSONArray response) {
                    Log.e("Resposta --> ", response.toString());
                    listaBebida = BebidaJsonParser.parserJsonBebida(response, context); /**  qwe */
/*
                    adicionarBebidaBD(listaBebida);
                }
            }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {

                }
            });
            volleyQueue.add(request);
        }
    }

    public void adicionarBebidaAPI(final Bebida bebida, final Context context){
        StringRequest req = new StringRequest(Request.Method.POST, mUrlApiLivros, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                System.out.println("----> Resposta add post: " + response);
                if (bebidaListener != null)
                    bebidaListener.onUpdateListaBebidaBD(BebidaJsonParser.parserJsonBebida(response, context), 1);

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
                params.put("descricao", bebida.getNomeBebida());
                params.put("preco", "" + bebida.getPrecoBebida());
                params.put("imagem", bebida.getImgBebida());
                params.put("id_tipo_bebida", "" + bebida.getIdTipoBebida());

                return params;
            }
        };
        volleyQueue.add(req);
    }

    @Override
    public void onRefreshListaBebida(ArrayList<Bebida> listaBebida){

    }

    @Override
    public void onUpdateListaBebidaBD(Bebida bebida, int operacao){
        switch (operacao){
            case 1:
                adicionarBebidaBD(bebida);
                break;
            case 2:
                editarBebidaBD(bebida);
                break;
            case 3:
                removerBebidaBD(bebida.getId());
                break;
        }
    }*/
}
