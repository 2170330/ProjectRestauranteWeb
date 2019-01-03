package pt.ipleiria.estg.dei.amsi.androidpr.fragment;

import android.content.Context;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentTransaction;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageButton;

import pt.ipleiria.estg.dei.amsi.androidpr.R;
import pt.ipleiria.estg.dei.amsi.androidpr.ativity.MenuCarneActivity;
import pt.ipleiria.estg.dei.amsi.androidpr.ativity.MenuCarneActivity;
import pt.ipleiria.estg.dei.amsi.androidpr.ativity.RegisterActivity;

public class SubMenuComidaFragment extends Fragment {

    private OnFragmentInteractionListener mListener;

    public SubMenuComidaFragment() {
        // Required empty public constructor
    }

    public static SubMenuComidaFragment newInstance() {
        SubMenuComidaFragment fragment = new SubMenuComidaFragment();
        return fragment;
    }
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
    }
    @Override
    public View onCreateView(final LayoutInflater inflater, final ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_sub_menu_comida, container, false);

        ImageButton mCarne = (ImageButton)view.findViewById(R.id.imgBtnCarneM);
        mCarne.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(getContext(), MenuCarneActivity.class));
            }
        });

        return view;
    }
    // TODO: Rename method, update argument and hook method into UI event
    public void onButtonPressed(Uri uri) {
        if (mListener != null) {
            mListener.onFragmentInteraction(uri);
        }
    }
    @Override
    public void onAttach(Context context) {
        super.onAttach(context);
    }
    @Override
    public void onDetach() {
        super.onDetach();
        mListener = null;
    }
    public interface OnFragmentInteractionListener {
        void onFragmentInteraction(Uri uri);
    }
}
