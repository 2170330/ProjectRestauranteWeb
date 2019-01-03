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
import pt.ipleiria.estg.dei.amsi.androidpr.ativity.LoginActivity;

/**
 * A simple {@link Fragment} subclass.
 * Activities that contain this fragment must implement the
 * {@link SubPratoComidaFragment.OnFragmentInteractionListener} interface
 * to handle interaction events.
 * Use the {@link SubPratoComidaFragment#newInstance} factory method to
 * create an instance of this fragment.
 */
public class SubPratoComidaFragment extends Fragment {

    private OnFragmentInteractionListener mListener;

    public SubPratoComidaFragment() {
        // Required empty public constructor
    }

    public static SubPratoComidaFragment newInstance(String param1, String param2) {
        SubPratoComidaFragment fragment = new SubPratoComidaFragment();
        return fragment;
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
    }

    @Override
    public View onCreateView(final LayoutInflater inflater, final ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_sub_prato_comida, container, false);

        ImageButton mCarne = (ImageButton)view.findViewById(R.id.imgBtnCarneP);

        mCarne.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
               // startActivity(new Intent(, PratoCarneFragment.class));
            }
        });

        return view;
    }

    public void replaceFragment(Fragment someFragment){
        FragmentTransaction transaction = getFragmentManager().beginTransaction();
        transaction.replace(R.id.frame_prato_cane, someFragment);
        transaction.addToBackStack(null);
        transaction.commit();
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
        // TODO: Update argument type and name
        void onFragmentInteraction(Uri uri);
    }
}
