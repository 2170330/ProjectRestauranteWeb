package pt.ipleiria.estg.dei.amsi.myapplication.Modelo;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import java.util.ArrayList;

public class BDHelper extends SQLiteOpenHelper {
    private static final int DB_VERSION = 1;
    private static final String DB_NAME = "CDR";

    private static final String TABLE_NAME = "Prato";
    private static final String TABLE_COMMON_ID_PRATO = "id";
    private static final String TABLE_PRATO_NOME_PRODUTO = "descricao";
    private static final String TABLE_PRATO_ID_TIPO_PRATO = "id_tipo_prato";
    private static final String TABLE_PRATO_PRECO = "precoPD";
    private static final String TABLE_PRATO_IMAGEM = "imagemPD";
    private static final String TABLE_PRATO_ID_DIA_SEMANA = "id_dia_semana";

    private static final String TABLE_NAME_BEBIDA = "Bebida";
    private static final String TABLE_COMMON_ID_BEBIDA = "id";
    private static final String TABLE_BEBIDA_NOME = "descricao";
    private static final String TABLE_BEBIDA_PRECO = "preco";
    private static final String TABLE_BEBIDA_IMAGEM = "preco";
    private static final String TABLE_BEBIDA_ID_TIPO_BEBIDA = "id_tipo_bebida";

    private final SQLiteDatabase database;

    public BDHelper(Context context) {
        super(context, DB_NAME, null, DB_VERSION);
        this.database = this.getWritableDatabase();
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        String createPratoTable = " CREATE TABLE IF NOT EXISTS " + TABLE_NAME +
                "(" + TABLE_COMMON_ID_PRATO + " INTEGER PRIMARY KEY AUTOINCREMENT, " +
                TABLE_PRATO_NOME_PRODUTO + " VARCHAR NOT NULL, " +
                TABLE_PRATO_ID_TIPO_PRATO + " INTEGER NOT NULL, " +
                TABLE_PRATO_PRECO + " DECIMAL NOT NULL, " +
                TABLE_PRATO_IMAGEM + " VARCHAR NOT NULL, " +
                TABLE_PRATO_ID_DIA_SEMANA + " INTEGER NOT NULL " + ");";
        db.execSQL(createPratoTable);

       /* String createBebidaTable = " CREATE TABLE IF NOT EXISTS " + TABLE_NAME_BEBIDA +
                "(" + TABLE_COMMON_ID_BEBIDA + " INTEGER PRIMARY KEY AUTOINCREMENT, " +
                TABLE_BEBIDA_NOME + " VARCHAR NOT NULL, " +
                TABLE_BEBIDA_PRECO + " DECIMAL NOT NULL, " +
                TABLE_BEBIDA_IMAGEM + " VARCHAR NOT NULL, " +
                TABLE_BEBIDA_ID_TIPO_BEBIDA + " INTEGER NOT NULL " + ");";
        db.execSQL(createBebidaTable);*/


    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL(" DROP TABLE IF EXISTS " + TABLE_NAME /*+ TABLE_NAME_BEBIDA*/);
        this.onCreate(db);
    }

    public Prato adicionarPratoDB(Prato prato){
        ContentValues values = new ContentValues();
        values.put(TABLE_PRATO_NOME_PRODUTO, prato.getNomeProdutoPD());
        values.put(TABLE_PRATO_ID_TIPO_PRATO, prato.getIdTipoPrato());
        values.put(TABLE_PRATO_PRECO, prato.getNomeProdutoPD());
        values.put(TABLE_PRATO_IMAGEM, prato.getImgPD());
        values.put(TABLE_PRATO_ID_DIA_SEMANA, prato.getIdDiaSemana());

        long id = this.database.insert(TABLE_NAME, null, values);
        if (id > -1){
            prato.setId(id);
            return prato;
        }
        return null;
    }
/*
    public Bebida adicionarBebidaDB(Bebida bebida){
        ContentValues values = new ContentValues();
        values.put(TABLE_BEBIDA_NOME, bebida.getNomeBebida());
        values.put(TABLE_BEBIDA_PRECO, bebida.getPrecoBebida());
        values.put(TABLE_BEBIDA_IMAGEM, bebida.getImgBebida());
        values.put(TABLE_BEBIDA_ID_TIPO_BEBIDA, bebida.getIdTipoBebida());

        long id = this.database.insert(TABLE_NAME_BEBIDA, null, values);
        if (id > -1){
            bebida.setId(id);
            return bebida;
        }
        return null;
    }
*/
    public boolean removePratoDB(long idPrato){
        return this.database.delete(TABLE_NAME, "id = ? ", new String[]{"" + idPrato}) == 1;
    }
/*
    public boolean removeBebidaDB(long idBebida){
        return this.database.delete(TABLE_NAME_BEBIDA, "id = ? ", new String[]{"" + idBebida}) == 1;
    }
*/
    public void removeAllPRatoDB(){
        this.database.delete(TABLE_NAME, null, null);
    }
/*
    public void removeAllBebidaDB(){
        this.database.delete(TABLE_NAME_BEBIDA, null, null);
    }
*/
    public ArrayList<Prato> getAllPratoDB(){
        ArrayList<Prato> pratos = new ArrayList<>();

        Cursor cursor = this.database.query(TABLE_NAME, new String[]{TABLE_COMMON_ID_PRATO,
                                                                        TABLE_PRATO_NOME_PRODUTO,
                                                                        TABLE_PRATO_ID_TIPO_PRATO,
                                                                        TABLE_PRATO_PRECO,
                                                                        TABLE_PRATO_IMAGEM,
                                                                        TABLE_PRATO_ID_DIA_SEMANA},
                                                                        null,
                                                                        null,
                                                                        null,
                                                                        null,
                                                                        null);
        if (cursor.moveToFirst()){
            do {
                Prato auxPrato = new Prato(
                        cursor.getLong(0),
                        cursor.getString(1),
                        cursor.getLong(2),
                        cursor.getLong(3),
                        cursor.getString(4),
                        cursor.getLong(5));
                auxPrato.setId(cursor.getLong(0));
                pratos.add(auxPrato);
            }while (cursor.moveToNext());
        }
        return pratos;
    }
/*
    public ArrayList<Bebida> getAllBebidaDB(){
        ArrayList<Bebida> bebidas = new ArrayList<>();

        Cursor cursor = this.database.query(TABLE_NAME_BEBIDA, new String[]{TABLE_COMMON_ID_BEBIDA,
                        TABLE_BEBIDA_NOME,
                        TABLE_BEBIDA_PRECO,
                        TABLE_BEBIDA_IMAGEM,
                        TABLE_BEBIDA_ID_TIPO_BEBIDA},
                null,
                null,
                null,
                null,
                null);
        if (cursor.moveToFirst()){
            do {
                Bebida auxBebida = new Bebida(
                        cursor.getLong(0),
                        cursor.getString(1),
                        cursor.getFloat(2),
                        cursor.getString(3),
                        cursor.getInt(4));
                auxBebida.setId(cursor.getLong(0));
                bebidas.add(auxBebida);
            }while (cursor.moveToNext());
        }
        return bebidas;
    }*/

    public boolean editarPratoDB(Prato prato){
        ContentValues values = new ContentValues();
        values.put(TABLE_PRATO_NOME_PRODUTO, prato.getNomeProdutoPD());
        values.put(TABLE_PRATO_ID_TIPO_PRATO, prato.getIdTipoPrato());
        values.put(TABLE_PRATO_PRECO, prato.getPrecoPD());
        values.put(TABLE_PRATO_IMAGEM, prato.getImgPD());
        values.put(TABLE_PRATO_ID_DIA_SEMANA, prato.getIdDiaSemana());

        return this.database.update(TABLE_NAME, values, "id = ?", new String[]{""+ prato.getId()}) > 0 ;
    }
/*
    public boolean editarBebidaDB(Bebida bebida){
        ContentValues values = new ContentValues();
        values.put(TABLE_BEBIDA_NOME, bebida.getNomeBebida());
        values.put(TABLE_BEBIDA_PRECO, bebida.getPrecoBebida());
        values.put(TABLE_BEBIDA_IMAGEM, bebida.getImgBebida());
        values.put(TABLE_BEBIDA_ID_TIPO_BEBIDA, bebida.getIdTipoBebida());

        return this.database.update(TABLE_NAME_BEBIDA, values, "id = ?", new String[]{""+ bebida.getId()}) > 0 ;
    }*/
}
