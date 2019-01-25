package pt.ipleiria.estg.dei.amsi.myapplication.Modelo;

public class Bebida {
    private long id;
    private String nomeBebida;
    private float precoBebida;
    private String imgBebida;
    private int idTipoBebida;

    public Bebida(long id, String nomeBebida, float precoBebida, String imgBebida, int idTipoBebida){
        this.id = id;
        this.nomeBebida = nomeBebida;
        this.precoBebida = precoBebida;
        this.imgBebida = imgBebida;
        this.idTipoBebida = idTipoBebida;
    }

    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public String getNomeBebida() {
        return nomeBebida;
    }

    public void setNomeBebida(String nomeBebida) {
        this.nomeBebida = nomeBebida;
    }

    public float getPrecoBebida() {
        return precoBebida;
    }

    public void setPrecoBebida(float precoBebida) {
        this.precoBebida = precoBebida;
    }

    public String getImgBebida() {
        return imgBebida;
    }

    public void setImgBebida(String imgBebida) {
        this.imgBebida = imgBebida;
    }

    public int getIdTipoBebida() {
        return idTipoBebida;
    }

    public void setIdTipoBebida(int idTipoBebida) {
        this.idTipoBebida = idTipoBebida;
    }
}
