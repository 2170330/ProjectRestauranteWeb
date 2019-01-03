package pt.ipleiria.estg.dei.amsi.androidpr.fragment.Adapter;

import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.ImageView;
import android.widget.Spinner;
import android.widget.TextView;

import pt.ipleiria.estg.dei.amsi.androidpr.R;
import pt.ipleiria.estg.dei.amsi.androidpr.fragment.modelo.DummyContent.DummyItem;
import pt.ipleiria.estg.dei.amsi.androidpr.fragment.modelo.Prato;

import java.util.ArrayList;


public class PratoDiaRecyclerViewAdapter extends BaseAdapter {

    private Context context;
    private LayoutInflater inflater;
    private ArrayList<Prato> prato;

    public PratoDiaRecyclerViewAdapter(Context context, ArrayList<Prato> prato) {
        this.context = context;
        this.prato = prato;
    }

    @Override
    public int getCount() {
        return prato.size();
    }

    @Override
    public Object getItem(int position) {
        return prato.get(position);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        ViewHolderListaPD viewHolderListaPD = null;
        if(inflater == null){
            inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        }

        if(convertView == null){
            convertView = inflater.inflate(R.layout.fragment_pratodia, null);

        }
        ViewHolderListaPD viewHolderLista = (ViewHolderListaPD) convertView.getTag();
        if (viewHolderLista == null){
            viewHolderLista = new ViewHolderListaPD(convertView);
            convertView.setTag(viewHolderLista);
        }
        viewHolderLista.updatePD(prato.get(position));

        return convertView;
    }

    public void refresh(ArrayList<Prato> prato){
        this.prato = prato;
        notifyDataSetChanged();

    }

    private class ViewHolderListaPD{
        private TextView textViewNome;
        private TextView textViewpreco;
        private ImageView imageView;
        private Button buttonIngredientes;
        private CheckBox checkBoxPD;

        public ViewHolderListaPD(View converView){
            textViewNome = converView.findViewById(R.id.tvNomePD);
            textViewpreco = converView.findViewById(R.id.tvPrecoPD);
            imageView = converView.findViewById(R.id.imageViewPD);
            buttonIngredientes = converView.findViewById(R.id.btnIngredientesPD);
            checkBoxPD = converView.findViewById(R.id.checkBoxPD);

        }

        public void updatePD(Prato prato){
            textViewNome.setText(prato.getNomeProdutoPD());
            textViewpreco.setText("" + prato.getNomeProdutoPD());


        }
    }


}
