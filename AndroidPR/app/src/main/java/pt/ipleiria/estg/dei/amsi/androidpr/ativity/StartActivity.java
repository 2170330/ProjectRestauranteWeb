package pt.ipleiria.estg.dei.amsi.androidpr.ativity;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;

import pt.ipleiria.estg.dei.amsi.androidpr.R;
import pt.ipleiria.estg.dei.amsi.androidpr.ativity.LoginActivity;
import pt.ipleiria.estg.dei.amsi.androidpr.ativity.RegisterActivity;

public class StartActivity extends AppCompatActivity {

    public EditText mRegister;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_start);

        mRegister = findViewById(R.id.editTextRegiste);
        mRegister.setFocusable(false);

    }

    public void Register(View view) {
        Intent intentR = new Intent(this, RegisterActivity.class);
        startActivity(intentR);
    }

    public void iniciar(View view) {
        Intent intentI = new Intent(this, SideBarMenuActivity.class);
        startActivity(intentI);
    }

    public void Inicio_Sessao(View view) {
        Intent intentIS = new Intent(this, LoginActivity.class);
        startActivity(intentIS);
    }
}
