package pt.ipleiria.estg.dei.amsi.myapplication.Adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;

import java.util.ArrayList;

import pt.ipleiria.estg.dei.amsi.myapplication.Modelo.Prato;
import pt.ipleiria.estg.dei.amsi.myapplication.R;

public class ListaPratoAdapter extends BaseAdapter {

    private Context context;
    private LayoutInflater inflater;
    private ArrayList<Prato> pratos;

    public ListaPratoAdapter(Context context, ArrayList<Prato> pratos){
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
            convertView = inflater.inflate(R.layout.item_list_pratos, null);
        }

        ViewHolderLista viewHolderLista = (ViewHolderLista) convertView.getTag();
        Toast.makeText(context, viewHolderLista + "", Toast.LENGTH_SHORT).show();
        if (viewHolderLista == null){

            viewHolderLista = new ViewHolderLista(convertView);
            convertView.setTag(viewHolderLista);
        }
        viewHolderLista.update(pratos.get(position));
        return convertView;
    }

    private class ViewHolderLista{
        private TextView textViewNomeProdutoPD;
        private TextView textViewPrecoPD;
        private ImageView imageViewImgPD;

        public ViewHolderLista(View convertView){
            textViewNomeProdutoPD = convertView.findViewById(R.id.tvNomePD);
            textViewPrecoPD = convertView.findViewById(R.id.tvPrecoPD);
            imageViewImgPD = convertView.findViewById(R.id.imgViewPD);
        }

        public void update(Prato prato){
            textViewNomeProdutoPD.setText(prato.getNomeProdutoPD());
            textViewPrecoPD.setText(String.valueOf(prato.getPrecoPD()));
            Glide.with(context)
                    .load(prato.getImgPD())
                    .placeholder(R.drawable.carne)
                    .fitCenter()
                    .thumbnail(0f)
                    .diskCacheStrategy(DiskCacheStrategy.ALL)
                    .into(imageViewImgPD);
        }
    }
    public void refresh(ArrayList<Prato> pratos){
        this.pratos = pratos;
        notifyDataSetChanged();
    }
}
