
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
    private String[] vidiojuegos;
    private String correo;
    private String[] genero;
    private String plataforma;
    private String decision;
    
    public datos() {
    }

  
    public String getNombre() {
        return nombre;
    }

 
    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

 
    public String[] getVidiojuegos() {
        return vidiojuegos;
    }

   
    public void setVidiojuegos(String[] Vidiojuegos) {
        this.vidiojuegos = Vidiojuegos;
    }

    /**
     * @return the idiomas
     */
    public String[] getGenero() {
        return genero;
    }

 
    public void setGenero(String[] Genero) {
        this.genero = Genero;
    }


    public String getPlataforma() {
        return plataforma;
    }

  
    public void setPlataforma(String Plataforma) {
        this.plataforma = Plataforma;
    }

 
    public String getDecision() {
        return decision;
    }

    public void setDecision(String motivo) {
        this.decision = motivo;
    }
  public ArrayList  getListaVidiojuegos(){
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
  public ArrayList  getListaPlataforma(){
    ArrayList lista=new ArrayList();
    lista.add(new SelectItem("Xbox One","Xbox One"));
    lista.add(new SelectItem("PlayStation 4","PlayStation 4"));
    lista.add(new SelectItem("PC","PC"));
    lista.add(new SelectItem("Wii u","Wii u"));
    lista.add(new SelectItem("Xbox 360","Xbox 360"));
    lista.add(new SelectItem("PlayStation 3","PlayStation 3"));
    return lista;

}
  public String concadenaGenero()
  {
      return implode(genero);
  }

  
    public String cadenaVidiojuegos()
  {
      return implode(vidiojuegos);
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
