package pt.ipleiria.estg.dei.amsi.myapplication.utils;

import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

import pt.ipleiria.estg.dei.amsi.myapplication.Modelo.Bebida;
import pt.ipleiria.estg.dei.amsi.myapplication.Modelo.Prato;

public class BebidaJsonParser {

    public static ArrayList<Bebida> parserJsonBebida(JSONArray response, Context context){
        ArrayList<Bebida> tempListaBebida = new ArrayList<Bebida>();
        try {
            for (int i = 0; i<response.length(); i++){
                JSONObject bebida = (JSONObject) response.get(i);

                long idBebida = (long) bebida.get("id");
                String nomeBebida = bebida.getString("descricao");
                float precoBebida = (float) bebida.get("preco");
                String imgBebida = bebida.getString("imagem");
                int idTipoBebida = (int) bebida.get("id_tipo_bebida");


                Bebida auxBebida = new Bebida(idBebida, nomeBebida, precoBebida, imgBebida, idTipoBebida);
                tempListaBebida.add(auxBebida);

            }
        }catch (JSONException ex){
            ex.printStackTrace();
            Toast.makeText(context, "Error: " + ex.getMessage(), Toast.LENGTH_SHORT).show();
        }
        return tempListaBebida;
    }

    public static Bebida parserJsonBebida(String response, Context context){
        Bebida bebidaAux = null;
        try {
            JSONObject bebida = new JSONObject(response);

            long idBebida = (long) bebida.get("id");
            String nomeBebida = bebida.getString("descricao");
            float precoBebida = (float) bebida.get("preco");
            String imgBebida = bebida.getString("imagem");
            int idTipoBebida = (int) bebida.get("id_tipo_bebida");


           bebidaAux = new Bebida(idBebida, nomeBebida, precoBebida, imgBebida, idTipoBebida);
        }catch (JSONException ex){
            ex.printStackTrace();
            Toast.makeText(context, "Error: " + ex.getMessage(), Toast.LENGTH_SHORT).show();
        }
        return bebidaAux;
    }

    public static boolean isConnectionInternet(Context context){
        ConnectivityManager cm = (ConnectivityManager) context.getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = cm.getActiveNetworkInfo();
        return networkInfo != null && networkInfo.isConnected();

    }
}
