package pt.ipleiria.estg.dei.amsi.projectandroidrestaurante;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Spinner;

public class StartActivity extends AppCompatActivity {



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_start);


    }

    public void Register(View view) {
        Intent intentR = new Intent(this, RegisterActivity.class);
        startActivity(intentR);
    }
}
