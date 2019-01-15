package pt.ipleiria.estg.dei.amsi.myapplication.Adapter;

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

import pt.ipleiria.estg.dei.amsi.myapplication.Modelo.PratoDia;
import pt.ipleiria.estg.dei.amsi.myapplication.R;

public class ListaPratoDiaAdapter extends BaseAdapter {

    private Context context;
    private LayoutInflater inflater;
    private ArrayList<PratoDia> pratoDias;

    public ListaPratoDiaAdapter(Context context, ArrayList<PratoDia> pratoDias){
        this.context = context;
        this.pratoDias = pratoDias;
    }


    @Override
    public int getCount() {
        return pratoDias.size();
    }

    @Override
    public Object getItem(int position) {
        return pratoDias.get(position);
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
        if (viewHolderLista == null){
            viewHolderLista = new ViewHolderLista(convertView);
            convertView.setTag(viewHolderLista);
        }
        viewHolderLista.update(pratoDias.get(position));
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

        public void update(PratoDia pratoDia){
            textViewNomeProdutoPD.setText(pratoDia.getNomeProdutoPD());
            textViewPrecoPD.setText(String.valueOf(pratoDia.getPrecoPD()));
            Glide.with(context)
                    .load(pratoDia.getImgPD())
                    .placeholder(R.drawable.carne)
                    .fitCenter()
                    .thumbnail(0f)
                    .diskCacheStrategy(DiskCacheStrategy.ALL)
                    .into(imageViewImgPD);
        }
    }
    public void refresh(ArrayList<PratoDia> pratoDias){
        this.pratoDias = pratoDias;
        notifyDataSetChanged();
    }
}
