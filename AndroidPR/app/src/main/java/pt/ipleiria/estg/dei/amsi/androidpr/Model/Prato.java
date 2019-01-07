package pt.ipleiria.estg.dei.amsi.androidpr.Model;

import java.text.DecimalFormat;

public class Prato {
    private int id;
    private String descricao;
    private int idTipoPrato;
    private String image;
    private int idDiaSemana;
    private DecimalFormat preco;

    public Prato(int id, String descricao, int idTipoPrato, String image, int idDiaSemana, DecimalFormat preco){
        this.id = id;
        this.descricao = descricao;
        this.idTipoPrato = idTipoPrato;
        this.image = image;
        this.idDiaSemana = idDiaSemana;
        this.preco = preco;
    }



    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getDescricao() {
        return descricao;
    }

    public void setDescricao(String descricao) {
        this.descricao = descricao;
    }


    public String getImage() {
        return image;
    }

    public void setImage(String image) {
        this.image = image;
    }

    public int getIdDiaSemana() {
        return idDiaSemana;
    }

    public void setIdDiaSemana(int idDiaSemana) {
        this.idDiaSemana = idDiaSemana;
    }

    public void setIdTipoPrato(int idTipoPrato) {
        this.idTipoPrato = idTipoPrato;
    }

    public DecimalFormat getPreco() {
        return preco;
    }

    public void setPreco(DecimalFormat preco) {
        this.preco = preco;
    }
}
