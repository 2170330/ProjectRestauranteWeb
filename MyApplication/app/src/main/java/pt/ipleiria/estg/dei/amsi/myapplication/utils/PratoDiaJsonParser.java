package pt.ipleiria.estg.dei.amsi.myapplication.utils;

import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

import pt.ipleiria.estg.dei.amsi.myapplication.Modelo.PratoDia;

public class PratoDiaJsonParser {
    public static ArrayList<PratoDia> parserJsonPratoDia(JSONArray response, Context context){
        ArrayList<PratoDia> tempListaPratoDia = new ArrayList<PratoDia>();
        try {
            for (int i = 0; i<response.length(); i++){
                JSONObject pratoDia = (JSONObject) response.get(i);

                int idPratoDia = (int) pratoDia.get("id");
                String nomeProdutoPD = pratoDia.getString("descricao");
                float precoPD = pratoDia.getInt("preco");
                String imgPD = pratoDia.getString("imagem");

                PratoDia auxPratoDia = new PratoDia(idPratoDia, nomeProdutoPD, precoPD, imgPD);
                tempListaPratoDia.add(auxPratoDia);

            }
        }catch (JSONException ex){
            ex.printStackTrace();
            Toast.makeText(context, "Error: " + ex.getMessage(), Toast.LENGTH_SHORT).show();
        }
        return tempListaPratoDia;
    }

    public static PratoDia parserJsonPratoDia(String response, Context context){
        PratoDia pratoDiaAux = null;
        try {
            JSONObject pratoDia = new JSONObject(response);

            int idPratoDia = (int) pratoDia.get("id");
            String nomeProdutoPD = pratoDia.getString("descricao");
            float precoPD = pratoDia.getInt("preco");
            String imgPD = pratoDia.getString("imagem");

            pratoDiaAux = new PratoDia(idPratoDia, nomeProdutoPD, precoPD, imgPD);
        }catch (JSONException ex){
            ex.printStackTrace();
            Toast.makeText(context, "Error: " + ex.getMessage(), Toast.LENGTH_SHORT).show();
        }
        return pratoDiaAux;
    }

    public static boolean isConnectionInternet(Context context){
        ConnectivityManager cm = (ConnectivityManager) context.getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = cm.getActiveNetworkInfo();
        return networkInfo != null && networkInfo.isConnected();

    }
}
