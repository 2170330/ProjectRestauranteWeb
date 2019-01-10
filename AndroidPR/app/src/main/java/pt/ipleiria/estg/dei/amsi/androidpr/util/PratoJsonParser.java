package pt.ipleiria.estg.dei.amsi.androidpr.util;

import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.text.DecimalFormat;
import java.util.ArrayList;

import pt.ipleiria.estg.dei.amsi.androidpr.Model.Prato;

public class PratoJsonParser {
    public static ArrayList<Prato> parserJsonPratos(JSONArray response, Context context){
        ArrayList<Prato> tempListaPratos = new ArrayList<Prato>();
        try{
            for (int i = 1; i<response.length(); i++ ){
                JSONObject prato = (JSONObject) response.get(i);

                int idPrato = prato.getInt("id");
                String descricao = prato.getString("descricao");
                int idTipoPrato = prato.getInt("id_tipo_prato");
                String preco = prato.getString("preco");
                String imagem = prato.getString("imagem");
                int idDiaSemana = prato.getInt("id_dia_semana");

                Prato auxPrato1 = new Prato(idPrato, descricao, idTipoPrato, preco, imagem, idDiaSemana);
                tempListaPratos.add(auxPrato1);

            }
        }catch (JSONException e){
            e.printStackTrace();
            Toast.makeText(context,"Erro: " + e.getMessage(), Toast.LENGTH_SHORT);
        }
        return tempListaPratos;
    }

    public static Prato parserJsonLivros(String response, Context context){
        Prato auxPrato = null;
        try{

            JSONObject prato = new JSONObject(response);

            int idPrato = prato.getInt("id");
            String descricao = prato.getString("descricao");
            int idTipoPrato = prato.getInt("id_tipo_prato");
            String preco = prato.getString("preco");
            String imagem = prato.getString("imagem");
            int idDiaSemana = prato.getInt("id_dia_semana");

            auxPrato = new Prato(idPrato, descricao, idTipoPrato, preco, imagem, idDiaSemana);



        }catch (JSONException ex){
            ex.printStackTrace();
            Toast.makeText(context, "Error: " + ex.getMessage(), Toast.LENGTH_SHORT).show();

        }
        return auxPrato;
    }

    public static boolean isConnectionInternet(Context context){
        ConnectivityManager cm = (ConnectivityManager) context.getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = (NetworkInfo) cm.getActiveNetworkInfo();
        return networkInfo != null && networkInfo.isConnected();

    }

}


