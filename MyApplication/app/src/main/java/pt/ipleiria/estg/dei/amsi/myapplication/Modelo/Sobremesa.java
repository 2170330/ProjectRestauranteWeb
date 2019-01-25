package pt.ipleiria.estg.dei.amsi.myapplication.Modelo;

public class Sobremesa {
    private long id;
    private String nomeSobremesa;
    private float precoSobremesa;
    private String imgSobremesa;

    public Sobremesa(long id, String nomeSobremesa, float precoSobremesa, String imgSobremesa){
        this.id = id;
        this.nomeSobremesa = nomeSobremesa;
        this.precoSobremesa = precoSobremesa;
        this.imgSobremesa = imgSobremesa;
    }

    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public String getNomeSobremesa() {
        return nomeSobremesa;
    }

    public void setNomeSobremesa(String nomeSobremesa) {
        this.nomeSobremesa = nomeSobremesa;
    }

    public float getPrecoSobremesa() {
        return precoSobremesa;
    }

    public void setPrecoSobremesa(float precoSobremesa) {
        this.precoSobremesa = precoSobremesa;
    }

    public String getImgSobremesa() {
        return imgSobremesa;
    }

    public void setImgSobremesa(String imgSobremesa) {
        this.imgSobremesa = imgSobremesa;
    }
}
