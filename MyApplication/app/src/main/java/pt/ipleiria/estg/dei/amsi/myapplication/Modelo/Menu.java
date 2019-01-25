package pt.ipleiria.estg.dei.amsi.myapplication.Modelo;

public class Menu {
    private long id;
    private long idPrato;
    private long idBebida;
    private long idSobremesa;
    private float precoMenu;
    private String imgMenu;

    public Menu(long id, long idPrato, long idBebida, long idSobremesa, float precoMenu, String imgMenu){
        this.id = id;
        this.idPrato = idPrato;
        this.idBebida = idBebida;
        this.idSobremesa = idSobremesa;
        this.precoMenu = precoMenu;
        this.imgMenu = imgMenu;
    }

    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public long getIdPrato() {
        return idPrato;
    }

    public void setIdPrato(long idPrato) {
        this.idPrato = idPrato;
    }

    public long getIdBebida() {
        return idBebida;
    }

    public void setIdBebida(long idBebida) {
        this.idBebida = idBebida;
    }

    public long getIdSobremesa() {
        return idSobremesa;
    }

    public void setIdSobremesa(long idSobremesa) {
        this.idSobremesa = idSobremesa;
    }

    public float getPrecoMenu() {
        return precoMenu;
    }

    public void setPrecoMenu(float precoMenu) {
        this.precoMenu = precoMenu;
    }

    public String getImgMenu() {
        return imgMenu;
    }

    public void setImgMenu(String imgMenu) {
        this.imgMenu = imgMenu;
    }
}
