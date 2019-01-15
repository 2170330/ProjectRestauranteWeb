package pt.ipleiria.estg.dei.amsi.myapplication.listeners;

import java.util.ArrayList;

import pt.ipleiria.estg.dei.amsi.myapplication.Modelo.PratoDia;

public interface PratoDiaListener {
    void onRefreshListaPratoDia(ArrayList<PratoDia> listaPratoDia);
    void onUpdateListaPratoDiaBD(PratoDia pratoDia, int operacao);
}
