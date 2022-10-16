/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Juan
 */
public class Datos {

    /**
     * Creates a new instance of Datos
     */
    private String[] nombres;
    public Datos() {
        nombres=new String[8];
        nombres[0]="Jose";
        nombres[1]="Manuel";
        nombres[2]="Andrés";
        nombres[3]="Clara";
        nombres[4]="Eulalia";
        nombres[5]="Nacho";
        nombres[6]="Dolores";
        nombres[7]="Antonio";
        
    }

    /**
     * @return the nombres
     */
    public String[] getNombres() {
        return nombres;
    }

    /**
     * @param nombres the nombres to set
     */
    public void setNombres(String[] nombres) {
        this.nombres = nombres;
    }
    
}
