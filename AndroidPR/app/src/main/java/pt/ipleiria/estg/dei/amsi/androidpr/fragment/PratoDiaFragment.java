package pt.ipleiria.estg.dei.amsi.androidpr.fragment;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.Spinner;
import android.widget.TextView;

import java.util.ArrayList;

import pt.ipleiria.estg.dei.amsi.androidpr.R;
import pt.ipleiria.estg.dei.amsi.androidpr.ativity.SideBarMenuActivity;
import pt.ipleiria.estg.dei.amsi.androidpr.fragment.Adapter.PratoDiaRecyclerViewAdapter;
import pt.ipleiria.estg.dei.amsi.androidpr.fragment.modelo.DummyContent;
import pt.ipleiria.estg.dei.amsi.androidpr.fragment.modelo.DummyContent.DummyItem;
import pt.ipleiria.estg.dei.amsi.androidpr.fragment.modelo.Prato;

import static pt.ipleiria.estg.dei.amsi.androidpr.R.id.tvNomePD;

public class PratoDiaFragment extends Fragment {

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_pratodia_list, container, false);


        return view;
    }


}
