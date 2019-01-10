package pt.ipleiria.estg.dei.amsi.androidpr.fragment.Adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;

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

        ViewHolderLista viewHolderLista = (ViewHolderLista) convertView.getTag();
        if (viewHolderLista == null){
            viewHolderLista = new ViewHolderLista(convertView);
            convertView.setTag(viewHolderLista);
        }

        viewHolderLista.update(pratos.get(position));


        return convertView;
    }

    private class ViewHolderLista{
        private TextView textViewDescricao;
        private ImageView textViewImagem;
        private TextView textViewPreco;

        public ViewHolderLista(View convertWiew){
            textViewDescricao = convertWiew.findViewById(R.id.tvNamePC);
            textViewPreco = convertWiew.findViewById(R.id.tvPrecoPC);
            textViewImagem = convertWiew.findViewById(R.id.imagePC);
        }

        public void update(Prato prato){
            textViewDescricao.setText(prato.getDescricao());
            textViewPreco.setText(prato.getPreco());
            Glide.with(context)
                .load(prato.getImage())
                .placeholder(R.drawable.carne)
                .fitCenter()
                .thumbnail(0f)
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .into(textViewImagem);
        }
    }
    public void refresh(ArrayList<Prato> pratos){
        this.pratos = pratos;
        notifyDataSetChanged();
    }
}
