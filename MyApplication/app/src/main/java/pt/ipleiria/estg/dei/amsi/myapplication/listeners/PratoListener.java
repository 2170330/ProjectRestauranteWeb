package pt.ipleiria.estg.dei.amsi.myapplication.listeners;

import java.util.ArrayList;

import pt.ipleiria.estg.dei.amsi.myapplication.Modelo.Prato;

public interface PratoListener {
    void onRefreshListaPrato(ArrayList<Prato> listaPratoDia);
    void onUpdateListaPratoBD(Prato pratoDia, int operacao);
}
