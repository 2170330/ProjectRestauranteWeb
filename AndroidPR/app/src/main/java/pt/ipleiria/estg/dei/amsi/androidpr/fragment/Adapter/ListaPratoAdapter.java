package pt.ipleiria.estg.dei.amsi.androidpr.fragment.Adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;

import java.util.ArrayList;

import pt.ipleiria.estg.dei.amsi.androidpr.Model.Prato;
import pt.ipleiria.estg.dei.amsi.androidpr.R;

public class ListaPratoAdapter extends BaseAdapter {
    private Context context;
    private LayoutInflater inflater;
    private ArrayList<Prato> pratos;

    public ListaPratoAdapter(Context context,  ArrayList<Prato> pratos){
        this.context = context;
        this.pratos = pratos;
    }

    @Override
    public int getCount() {
        return pratos.size();
    }

    @Override
    public Object getItem(int position) {
        return pratos.get(position);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        if (inflater == null){
            inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        }
        if (convertView == null){
            convertView = inflater.inflate(R.layout.fragment_pratocarne_list, null);
        }

        return null;
    }
}
