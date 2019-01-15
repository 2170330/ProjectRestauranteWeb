package pt.ipleiria.estg.dei.amsi.myapplication.Modelo;

public class PratoDia {
    private long id;
    private String nomeProdutoPD;
    private float precoPD;
    private String imgPD;




    public PratoDia(long id, String nomeProdutoPD, float precoPD, String imgPD){
        this.id = id;
        this.nomeProdutoPD = nomeProdutoPD;
        this.precoPD = precoPD;
        this.imgPD = imgPD;

    }

    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public String getNomeProdutoPD() {
        return nomeProdutoPD;
    }

    public void setNomeProdutoPD(String nomeProdutoPD) {
        this.nomeProdutoPD = nomeProdutoPD;
    }

    public float getPrecoPD() {
        return precoPD;
    }

    public void setPrecoPD(float precoPD) {
        precoPD = precoPD;
    }

    public String getImgPD() {
        return imgPD;
    }

    public void setImgPD(String imgPD) {
        imgPD = imgPD;
    }
}
