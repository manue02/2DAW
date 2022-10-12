
import java.util.ArrayList;
import javax.faces.model.SelectItem;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author alumno
 */
public class datos {

    private String nombre;
    private String sistema;
    private String correo;
    private String[] idiomas;
    private String[] lenguajes;
    private String motivo;
    
    public datos() {
    }

    /**
     * @return the nombre
     */
    public String getNombre() {
        return nombre;
    }

    /**
     * @param nombre the nombre to set
     */
    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    /**
     * @return the sistema
     */
    public String getSistema() {
        return sistema;
    }

    /**
     * @param sistema the sistema to set
     */
    public void setSistema(String sistema) {
        this.sistema = sistema;
    }

    /**
     * @return the idiomas
     */
    public String[] getIdiomas() {
        return idiomas;
    }

    /**
     * @param idiomas the idiomas to set
     */
    public void setIdiomas(String[] idiomas) {
        this.idiomas = idiomas;
    }

    /**
     * @return the lenguajes
     */
    public String[] getLenguajes() {
        return lenguajes;
    }

    /**
     * @param lenguajes the lenguajes to set
     */
    public void setLenguajes(String[] lenguajes) {
        this.lenguajes = lenguajes;
    }

    /**
     * @return the motivo
     */
    public String getMotivo() {
        return motivo;
    }

    /**
     * @param motivo the motivo to set
     */
    public void setMotivo(String motivo) {
        this.motivo = motivo;
    }
  public ArrayList  getListaSistemas(){
    ArrayList lista=new ArrayList();
    lista.add(new SelectItem("Win10","Windows 10"));
    lista.add(new SelectItem("Win7","Windows 7"));
    lista.add(new SelectItem("Linux","Linux"));
    lista.add(new SelectItem("Ios","Ios"));
    return lista;

}
  public ArrayList  getListaLenguajes(){
    ArrayList lista=new ArrayList();
    lista.add(new SelectItem("Java","Java"));
    lista.add(new SelectItem("Asp","ASP.NET"));
    lista.add(new SelectItem("VisualBasic","Visual Basic"));
    lista.add(new SelectItem("JavaScript","Javascript"));
    lista.add(new SelectItem("PHP","PHP"));
    lista.add(new SelectItem("PYTHON","Python"));
    return lista;

}
  public String concadenaIdiomas()
  {
      return implode(idiomas);
  }
  public String concadenaLenguajes()
  {
      return implode(lenguajes);
  }
  public String implode(String[] pArray){
      String devuelve="";
      for (String cadena:pArray){
          devuelve+=cadena+",";
      }
      devuelve=devuelve.substring(0, devuelve.length()-1);
      return devuelve;
  }

    /**
     * @return the correo
     */
    public String getCorreo() {
        return correo;
    }

    /**
     * @param correo the correo to set
     */
    public void setCorreo(String correo) {
        this.correo = correo;
    }
}
