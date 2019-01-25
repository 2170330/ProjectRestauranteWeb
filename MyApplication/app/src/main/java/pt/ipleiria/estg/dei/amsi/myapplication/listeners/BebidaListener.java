package pt.ipleiria.estg.dei.amsi.myapplication.listeners;

import java.util.ArrayList;

import pt.ipleiria.estg.dei.amsi.myapplication.Modelo.Bebida;
import pt.ipleiria.estg.dei.amsi.myapplication.Modelo.Prato;

public interface BebidaListener {
    void onRefreshListaBebida(ArrayList<Bebida> listaBebida);
    void onUpdateListaBebidaBD(Bebida bebida, int operacao);
}
