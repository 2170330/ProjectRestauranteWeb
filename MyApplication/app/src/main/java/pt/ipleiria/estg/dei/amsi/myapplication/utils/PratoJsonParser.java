package pt.ipleiria.estg.dei.amsi.myapplication.utils;

import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.math.BigDecimal;
import java.util.ArrayList;

import pt.ipleiria.estg.dei.amsi.myapplication.Modelo.Prato;

public class PratoJsonParser {
    public static ArrayList<Prato> parserJsonPrato(JSONArray response, Context context){
        ArrayList<Prato> tempListaPrato = new ArrayList<Prato>();
        try {
            for (int i = 0; i<response.length(); i++){
                JSONObject prato = (JSONObject) response.get(i);

                int idPrato = prato.getInt("id");
                String nomeProdutoPD = prato.getString("descricao");
                long idTipoPrato =  prato.getLong("id_tipo_prato");
                float precoPD = BigDecimal.valueOf(prato.getDouble("preco")).floatValue();
                String imgPD = prato.getString("imagem");
                int idDiaSemana =prato.optInt("id_dia_semana", 1);


                Prato auxPrato = new Prato(idPrato, nomeProdutoPD, idTipoPrato, precoPD, imgPD, idDiaSemana);
                tempListaPrato.add(auxPrato);

            }
        }catch (JSONException ex){
            ex.printStackTrace();
            Toast.makeText(context, "Error: " + ex.getMessage(), Toast.LENGTH_SHORT).show();
        }
        return tempListaPrato;
    }

    public static Prato parserJsonPrato(String response, Context context){
        Prato pratoAux = null;
        try {
            JSONObject prato = new JSONObject(response);

            int idPrato = prato.getInt("id");
            String nomeProdutoPD = prato.getString("descricao");
            long idTipoPrato =  prato.getLong("id_tipo_prato");
            float precoPD = BigDecimal.valueOf(prato.getDouble("preco")).floatValue();
            String imgPD = prato.getString("imagem");
            int idDiaSemana =prato.optInt("id_dia_semana", 1);

            pratoAux = new Prato(idPrato, nomeProdutoPD, idTipoPrato, precoPD, imgPD, idDiaSemana);
        }catch (JSONException ex){
            ex.printStackTrace();
            Toast.makeText(context, "Error: " + ex.getMessage(), Toast.LENGTH_SHORT).show();
        }
        return pratoAux;
    }

    public static boolean isConnectionInternet(Context context){
        ConnectivityManager cm = (ConnectivityManager) context.getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = cm.getActiveNetworkInfo();
        return networkInfo != null && networkInfo.isConnected();

    }
}
