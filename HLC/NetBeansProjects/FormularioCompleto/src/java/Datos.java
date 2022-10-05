
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
public class Datos {
  
        private String nombre;
        private String motivo;
        private String sistema;
        private String[] idiomas;
         private String[] lenguajes;


        

    /**
     * Creates a new instance of Datos
     */
    public Datos() {
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

    public ArrayList getListaSistemas(){

        ArrayList lista = new ArrayList();

        lista.add(new SelectItem("Win10" , "Win10"));
        lista.add(new SelectItem("Win7" , "Win7"));
        lista.add(new SelectItem("Linux" , "Linux "));
        lista.add(new SelectItem("Ios" , "ios"));

        return lista ;
    }
    
    public ArrayList getListaLenguajes(){

        ArrayList lista = new ArrayList();

        lista.add(new SelectItem("Java" , "Java"));
        lista.add(new SelectItem("asp" , "asp"));
        lista.add(new SelectItem("phyton" , "phyton "));
        lista.add(new SelectItem("visual" , "visual"));
        lista.add(new SelectItem("php" , "php"));
        lista.add(new SelectItem("c++" , "c++"));
        lista.add(new SelectItem("javascript" , "javascript "));
        lista.add(new SelectItem("Code" , "Code"));

        return lista ;
    }
   

    public String implode (String [] pArray){
    
        String devuelve="";
        for(String cadena:pArray){
       
            devuelve+=cadena + ",";
            
        }
        devuelve = devuelve.substring(0, devuelve.length()-1);
        return devuelve;
        }

    
    }

