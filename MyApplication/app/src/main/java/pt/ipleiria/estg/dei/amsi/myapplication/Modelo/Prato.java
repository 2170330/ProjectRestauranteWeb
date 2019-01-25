package pt.ipleiria.estg.dei.amsi.myapplication.Modelo;

public class Prato {
    private long id;
    private String nomeProdutoPD;
    private long idTipoPrato;
    private float precoPD;
    private String imgPD;
    private long idDiaSemana;




    public Prato(long id, String nomeProdutoPD, long idTipoPrato, float precoPD, String imgPD, long idDiaSemana){
        this.id = id;
        this.nomeProdutoPD = nomeProdutoPD;
        this.idTipoPrato = idTipoPrato;
        this.precoPD = precoPD;
        this.imgPD = imgPD;
        this.idDiaSemana = idDiaSemana;

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

    public long getIdTipoPrato() {
        return idTipoPrato;
    }

    public void setIdTipoPrato(long idTipoPrato) {
        this.idTipoPrato = idTipoPrato;
    }

    public float getPrecoPD() {
        return precoPD;
    }

    public void setPrecoPD(float precoPD) {
        this.precoPD = precoPD;
    }

    public String getImgPD() {
        return imgPD;
    }

    public void setImgPD(String imgPD) {
        this.imgPD = imgPD;
    }

    public long getIdDiaSemana() {
        return idDiaSemana;
    }

    public void setIdDiaSemana(long idDiaSemana) {
        this.idDiaSemana = idDiaSemana;
    }
}
