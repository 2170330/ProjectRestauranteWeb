package pt.ipleiria.estg.dei.amsi.myapplication.Modelo;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import java.util.ArrayList;

public class PratoDiaBDHelper extends SQLiteOpenHelper {
    private static final int DB_VERSION = 1;
    private static final String DB_NAME = "PratoDiaDB";

    private static final String TABLE_NAME = "PratoDia";
    private static final String TABLE_COMMON_ID = "id";
    private static final String TABLE_PRATO_DIA_NOME_PRODUTO = "descricao";
    private static final String TABLE_PRATO_DIA_PRECO = "precoPD";
    private static final String TABLE_PRATO_DIA_IMAGEM = "imagemPD";

    private final SQLiteDatabase database;

    public PratoDiaBDHelper(Context context) {
        super(context, DB_NAME, null, DB_VERSION);
        this.database = this.getWritableDatabase();
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        String createPratoDiaTable = " CREATE TABLE IF NOT EXISTS " + TABLE_NAME +
                "(" + TABLE_COMMON_ID + " INTEGER PRIMARY KEY AUTOINCREMENT, " +
                TABLE_PRATO_DIA_NOME_PRODUTO + " TEXT NOT NULL, " +
                TABLE_PRATO_DIA_PRECO + " INTEGER NOT NULL, " +
                TABLE_PRATO_DIA_IMAGEM + " TEXT NOT NULL " + ");";
        db.execSQL(createPratoDiaTable);

    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL(" DROP TABLE IF EXISTS " + TABLE_NAME);
        this.onCreate(db);
    }

    public PratoDia adicionarPratoDiaDB(PratoDia pratoDia){
        ContentValues values = new ContentValues();
        values.put(TABLE_PRATO_DIA_NOME_PRODUTO, pratoDia.getNomeProdutoPD());
        values.put(TABLE_PRATO_DIA_PRECO, pratoDia.getNomeProdutoPD());
        values.put(TABLE_PRATO_DIA_IMAGEM, pratoDia.getImgPD());

        long id = this.database.insert(TABLE_NAME, null, values);
        if (id > -1){
            pratoDia.setId(id);
            return pratoDia;
        }
        return null;
    }

    public boolean removePratoDiaDB(long idPratoDia){
        return this.database.delete(TABLE_NAME, "id = ? ", new String[]{"" + idPratoDia}) == 1;
    }

    public void removeAllPRatoDiaDB(){
        this.database.delete(TABLE_NAME, null, null);
    }

    public ArrayList<PratoDia> getAllPratoDiaDB(){
        ArrayList<PratoDia> pratoDias = new ArrayList<>();

        Cursor cursor = this.database.query(TABLE_NAME, new String[]{TABLE_COMMON_ID, TABLE_PRATO_DIA_NOME_PRODUTO, TABLE_PRATO_DIA_NOME_PRODUTO, TABLE_PRATO_DIA_PRECO, TABLE_PRATO_DIA_IMAGEM},
                null, null, null, null, null);

        if (cursor.moveToFirst()){
            do {
                PratoDia auxPratoDia = new PratoDia(
                        cursor.getInt(0),
                        cursor.getString(1),
                        cursor.getLong(2),
                        cursor.getString(3));
                auxPratoDia.setId(cursor.getLong(0));
                pratoDias.add(auxPratoDia);
            }while (cursor.moveToNext());
        }
        return pratoDias;
    }

    public boolean editarPratoDiaDB(PratoDia pratoDia){
        ContentValues values = new ContentValues();
        values.put(TABLE_PRATO_DIA_NOME_PRODUTO, pratoDia.getNomeProdutoPD());
        values.put(TABLE_PRATO_DIA_PRECO, pratoDia.getNomeProdutoPD());
        values.put(TABLE_PRATO_DIA_IMAGEM, pratoDia.getImgPD());

        return this.database.update(TABLE_NAME, values, "id = ?", new String[]{""+ pratoDia.getId()}) > 0 ;
    }
}
