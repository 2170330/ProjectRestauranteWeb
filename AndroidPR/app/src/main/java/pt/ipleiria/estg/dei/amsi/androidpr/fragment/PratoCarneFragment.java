package pt.ipleiria.estg.dei.amsi.androidpr.fragment;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ListView;

import java.util.ArrayList;

import pt.ipleiria.estg.dei.amsi.androidpr.Listener.PratoListener;
import pt.ipleiria.estg.dei.amsi.androidpr.Model.Prato;
import pt.ipleiria.estg.dei.amsi.androidpr.Model.SingletonGestorPratos;
import pt.ipleiria.estg.dei.amsi.androidpr.R;
import pt.ipleiria.estg.dei.amsi.androidpr.ativity.PratoDetalhes;
import pt.ipleiria.estg.dei.amsi.androidpr.ativity.SideBarMenuActivity;
import pt.ipleiria.estg.dei.amsi.androidpr.fragment.Adapter.ListaPratoAdapter;
import pt.ipleiria.estg.dei.amsi.androidpr.util.PratoJsonParser;

public class PratoCarneFragment extends Fragment implements PratoListener {

    private ListView lvLista;
    private ArrayList<Prato> listaPratos;
    private ListaPratoAdapter listaPratoAdapter;

    final static String PRATO_DETALHES = "Prato";

    SharedPreferences sharedPreferences;
    SharedPreferences.Editor editor;



    @SuppressWarnings("unused")
    public static PratoCarneFragment newInstance(int columnCount) {
        PratoCarneFragment fragment = new PratoCarneFragment();
        return fragment;
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_pratocarne_list, container, false);

        sharedPreferences = getActivity().getPreferences(Context.MODE_PRIVATE);
        editor = sharedPreferences.edit();

        SingletonGestorPratos.getInstance(getActivity().getApplicationContext()).setPratoListener(this);
        SingletonGestorPratos.getInstance(getActivity().getApplicationContext()).getAllPratosApi(getActivity().getApplicationContext(), PratoJsonParser.isConnectionInternet(getActivity().getApplicationContext()));
        lvLista = (ListView) view.findViewById(R.id.frame_prato_cane);

        lvLista.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                Prato tempPrato = (Prato) parent.getItemAtPosition(position);
                Intent intent = new Intent(getActivity().getApplicationContext(), PratoDetalhes.class);
                intent.putExtra(PRATO_DETALHES, tempPrato.getId());
                startActivity(intent);

            }
        });


        return view;
    }


    @Override
    public void onDetach() {
        super.onDetach();
        mListener = null;
    }

    @Override
    public void onRefreshListaPratos(ArrayList<Prato> listaPrato) {
        if (!listaPratos.isEmpty()){
            ListaPratoAdapter listaPratoAdapter = new ListaPratoAdapter(getContext(), listaPratos);
            lvLista.setAdapter(listaPratoAdapter);
            listaPratoAdapter.refresh(listaPratos);
        }
        SingletonGestorPratos.getInstance(getActivity().getApplicationContext()).getAllPratosApi(getActivity().getApplicationContext(), PratoJsonParser.isConnectionInternet(getActivity().getApplicationContext()));
    }

}
