package pt.ipleiria.estg.dei.amsi.androidpr.Model;

import android.app.DownloadManager;

import com.android.volley.RequestQueue;

import java.util.ArrayList;

public class SingletonGestorPratos {

    private static SingletonGestorPratos INSTANCE = null;

    private ArrayList<Prato> pratos;

    private static RequestQueue volleyQueue = null;
    private String mUrlApiPratos = "http://localhost:8080/api/prato";

}
