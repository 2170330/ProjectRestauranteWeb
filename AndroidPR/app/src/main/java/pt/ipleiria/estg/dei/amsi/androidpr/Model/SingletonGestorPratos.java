package pt.ipleiria.estg.dei.amsi.androidpr.Model;

import android.app.DownloadManager;
import android.content.Context;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;

import java.util.ArrayList;

import pt.ipleiria.estg.dei.amsi.androidpr.Listener.PratoListener;
import pt.ipleiria.estg.dei.amsi.androidpr.util.PratoJsonParser;

public class SingletonGestorPratos {

    private static SingletonGestorPratos INSTANCE = null;

    private ArrayList<Prato> pratos;
    private PratoListener pratoListener;

    private static RequestQueue volleyQueue = null;
    private String mUrlApiPratos = "http://192.168.43.169/api/prato";

    public static synchronized SingletonGestorPratos getInstance(Context context){
        if (INSTANCE == null){
            INSTANCE = new SingletonGestorPratos(context);
            volleyQueue = Volley.newRequestQueue(context);
        }
        return INSTANCE;
    }

    private SingletonGestorPratos(Context context){
        pratos = new ArrayList<>();
    }

    public Prato getPrato(int idPrato){
        for (Prato prato : pratos){
            if (prato.getId() == idPrato){
                return prato;
            }
        }
        return null;
    }
    public void setPratoListener(PratoListener pratoListener){
        this.pratoListener = pratoListener;
    }

    public void getAllPratosApi(final Context context, boolean isConected){
        if (!isConected){
            if (pratoListener != null){
                pratoListener.onRefreshListaPratos(pratos);
            }
        }else {
            JsonArrayRequest request = new JsonArrayRequest(Request.Method.GET, mUrlApiPratos, null, new Response.Listener<JSONArray>() {
                @Override
                public void onResponse(JSONArray response) {
                    System.out.println("--> Resposta: " + response);
                    pratos = PratoJsonParser.parserJsonPratos(response, context);
                    if (pratoListener != null) {
                        pratoListener.onRefreshListaPratos(pratos);
                    }
                }
            }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {

                }
            });
            volleyQueue.add(request);
        }
    }

}
