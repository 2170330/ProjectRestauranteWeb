package pt.ipleiria.estg.dei.amsi.androidpr.fragment.modelo;

public class Prato {
    private long Id;
    private String NomeProdutoPD;
    private float PrecoPD;
    private String ImgPD;




    public Prato(long id, String NomeProdutoPD, float PrecoPD, String ImgPD){
        this.Id = id;
        this.NomeProdutoPD = NomeProdutoPD;
        this.PrecoPD = PrecoPD;
        this.ImgPD = ImgPD;

    }

    public long getId() {
        return Id;
    }

    public void setId(long id) {
        Id = id;
    }

    public String getNomeProdutoPD() {
        return NomeProdutoPD;
    }

    public void setNomeProdutoPD(String nomeProdutoPD) {
        NomeProdutoPD = nomeProdutoPD;
    }

    public float getPrecoPD() {
        return PrecoPD;
    }

    public void setPrecoPD(float precoPD) {
        PrecoPD = precoPD;
    }

    public String getImgPD() {
        return ImgPD;
    }

    public void setImgPD(String imgPD) {
        ImgPD = imgPD;
    }
}
