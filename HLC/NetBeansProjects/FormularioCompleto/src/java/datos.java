
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
    private String[] sistema;
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
    public String[] getSistema() {
        return sistema;
    }

    /**
     * @param sistema the sistema to set
     */
    public void setSistema(String[] sistema) {
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
    lista.add(new SelectItem("Age of Empires","Age of Empires"));
    lista.add(new SelectItem("Battelfield","Battelfield"));
    lista.add(new SelectItem("Counter Strike","Counter Strike"));
    lista.add(new SelectItem("Dead Space","Dead Space"));
    lista.add(new SelectItem("Doom","Doom"));
    lista.add(new SelectItem("Half Life","Half Life"));
    lista.add(new SelectItem("Metal Gear Solid","Metal Gear Solid"));
    lista.add(new SelectItem("Resident Evil","Resident Evil"));
    lista.add(new SelectItem("Shadow of the Colossus","Shadow of the Colossus"));
    lista.add(new SelectItem("Super Mario","Super Mario"));
    return lista;

}
  public ArrayList  getListaLenguajes(){
    ArrayList lista=new ArrayList();
    lista.add(new SelectItem("Xbox One","Xbox One"));
    lista.add(new SelectItem("PlayStation 4","PlayStation 4"));
    lista.add(new SelectItem("PC","PC"));
    lista.add(new SelectItem("Wii u","Wii u"));
    lista.add(new SelectItem("Xbox 360","Xbox 360"));
    lista.add(new SelectItem("PlayStation 3","PlayStation 3"));
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
  
    public String cadenaSistemas()
  {
      return implode(sistema);
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
