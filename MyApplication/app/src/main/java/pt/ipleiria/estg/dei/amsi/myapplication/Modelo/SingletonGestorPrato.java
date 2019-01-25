package pt.ipleiria.estg.dei.amsi.myapplication.Modelo;

import android.content.Context;
import android.util.Base64;
import android.util.Log;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
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

import pt.ipleiria.estg.dei.amsi.myapplication.listeners.PratoListener;
import pt.ipleiria.estg.dei.amsi.myapplication.utils.PratoJsonParser;

public class SingletonGestorPrato implements PratoListener {
    private static SingletonGestorPrato INSTANCE = null;
    private ArrayList<Prato> listaPrato;
    private BDHelper BDHelper;

    private static RequestQueue volleyQueue;

    private String IP = "192.168.1.185:8080";

    private String mUrlApiLivros = "http://" + IP + "/api/prato";
    private String mUrlApiLogin = "http://" + IP + "/site/login";

    private PratoListener pratoListener;

    public static synchronized SingletonGestorPrato getInstance(Context context){
        if (INSTANCE == null){
            INSTANCE = new SingletonGestorPrato(context);
            volleyQueue = Volley.newRequestQueue(context);
        }
        return INSTANCE;
    }


    public SingletonGestorPrato(Context context){
        listaPrato = new ArrayList<>();
        BDHelper = new BDHelper(context);

    }
    public Prato getPrato(long idPrato){
        for (Prato prato: listaPrato){
            if (prato.getId() == idPrato){
                return prato;
            }
        }
        return null;
    }


    public void adicionarPratoBD(Prato prato){
        BDHelper.adicionarPratoDB(prato);
    }

    public void adicionarPratoBD(ArrayList<Prato> listaPrato){
       removerPratoBD();
       for (Prato prato:listaPrato){
           adicionarPratoBD(prato);
       }
    }

    public void setPratoListener(PratoListener pratoListener){
        this.pratoListener = pratoListener;
    }


    public void removerPratoBD(long idPrato){
        Prato auxPrato = getPrato(idPrato);
        if (auxPrato != null){
            if (BDHelper.removePratoDB(auxPrato.getId()))
                listaPrato.remove(auxPrato);
        }
    }

    public void removerPratoBD(){
        BDHelper.removeAllPRatoDB();
    }

    public void editarPratoBD(Prato prato){
        if (!listaPrato.contains(prato))
            return;

        Prato auxPrato = getPrato(prato.getId());
        auxPrato.setNomeProdutoPD(prato.getNomeProdutoPD());
        auxPrato.setPrecoPD(prato.getPrecoPD());
        auxPrato.setImgPD(prato.getImgPD());

        if (BDHelper.editarPratoDB(auxPrato))
            System.out.println("Prato adicionado");
    }

    public void getAllPratoAPI(final Context context, boolean isConnected){

        if (!isConnected){
            listaPrato = BDHelper.getAllPratoDB();
            if (listaPrato != null){
                pratoListener.onRefreshListaPrato(listaPrato);
            }
        }else {
            Toast.makeText(context, "Is connected" + isConnected, Toast.LENGTH_SHORT).show();
            JsonArrayRequest request = new JsonArrayRequest(Request.Method.GET, mUrlApiLivros, null, new Response.Listener<JSONArray>() {
                @Override
                public void onResponse(JSONArray response) {
                    Log.e("Resposta --> ", response.toString());
                    listaPrato = PratoJsonParser.parserJsonPrato(response, context);
                    adicionarPratoBD(listaPrato);
                }
            }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Toast.makeText(context, error + "", Toast.LENGTH_SHORT).show();
                }
            })
                {
                    @Override
                    public Map<String, String> getHeaders() throws AuthFailureError {
                    String credentials = "Dinis Roxo" + ":" + "123456";
                    String base64EncodedCredentials = Base64.encodeToString(credentials.getBytes(), Base64.NO_WRAP);
                    HashMap<String, String> headers = new HashMap<>();
                    headers.put("Authorization", "Basic " + base64EncodedCredentials);
                    return headers;
                }
            };

            volleyQueue.add(request);
        }
    }

    public void adicionarPratoAPI(final Prato prato, final Context context){
        StringRequest req = new StringRequest(Request.Method.POST, mUrlApiLivros, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                System.out.println("----> Resposta add post: " + response);
                if (pratoListener != null)
                    pratoListener.onUpdateListaPratoBD(PratoJsonParser.parserJsonPrato(response, context), 1);

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
                params.put("descricao", prato.getNomeProdutoPD());
                params.put("precoPD", ""+ prato.getPrecoPD());
                params.put("imgPD", prato.getImgPD());

                return params;
            }
        };
        volleyQueue.add(req);
    }

    @Override
    public void onRefreshListaPrato(ArrayList<Prato> listaPratos){

    }

    @Override
    public void onUpdateListaPratoBD(Prato prato, int operacao){
        switch (operacao){
            case 1:
                adicionarPratoBD(prato);
                break;
            case 2:
                editarPratoBD(prato);
                break;
            case 3:
                removerPratoBD(prato.getId());
                break;
        }
    }
}
