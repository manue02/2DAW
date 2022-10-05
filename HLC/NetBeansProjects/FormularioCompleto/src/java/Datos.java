
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
  
        private String frase;
        private String Cadena;
        private int contador;
        private String resultado;


    /**
     * Creates a new instance of Datos
     */
    public Datos() {
    }

    /**
     * @return the frase
     */
    public String getFrase() {
        return frase;
    }

    /**
     * @param frase the frase to set
     */
    public void setFrase(String frase) {
        this.frase = frase;
    }

    /**
     * @return the contador
     */
    public int getContador() {
        return contador;
    }

    /**
     * @param contador the contador to set
     */
    public void setContador(int contador) {
        this.contador = contador;
    }

    /**
     * @return the resultado
     */
    public String getResultado() {
        
        
        
        while (this.contador < 7){
        
             System.out.print(this.frase);
            this.contador++;
        }
        
        return resultado;
    }


     }

