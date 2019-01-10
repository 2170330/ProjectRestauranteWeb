package pt.ipleiria.estg.dei.amsi.androidpr.Listener;

import java.util.ArrayList;

import pt.ipleiria.estg.dei.amsi.androidpr.Model.Prato;

public interface PratoListener {
    void onRefreshListaPratos(ArrayList<Prato> listaPrato);
}
