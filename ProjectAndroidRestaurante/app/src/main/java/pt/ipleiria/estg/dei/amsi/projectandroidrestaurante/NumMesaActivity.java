<<<<<<< HEAD
package pt.ipleiria.estg.dei.amsi.projectandroidrestaurante;

import android.content.Intent;
import android.support.v7.app.ActionBar;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Spinner;
import android.widget.Toast;

public class NumMesaActivity extends AppCompatActivity implements AdapterView.OnItemSelectedListener {

    String[] NumMesa = {"1", "2", "3"};
    

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_num_mesa);

        Spinner spinner = (Spinner)findViewById(R.id.spinnerNumMesa);
        ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(this, R.array.numbers, android.R.layout.simple_spinner_item);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner.setAdapter(adapter);
        spinner.setOnItemSelectedListener(this);


    }

    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
        String text = parent.getItemAtPosition(position).toString();
        Toast.makeText(parent.getContext(), text, Toast.LENGTH_SHORT).show();

    }

    @Override
    public void onNothingSelected(AdapterView<?> parent) {

    }

    public void Inicio_Sessao(View view) {
        Intent intentIS = new Intent(this, StartActivity.class);
        startActivity(intentIS);
    }
}
=======
package pt.ipleiria.estg.dei.amsi.projectandroidrestaurante;

import android.support.v7.app.ActionBar;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

public class NumMesaActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_num_mesa);
    }
}
>>>>>>> ba7b66e4b25c3e1fedfe7dcca4f02f5811505159
