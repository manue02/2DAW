
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

private String operacion;

    /**
     * Creates a new instance of Datos
     */
    public Datos() {
    }

    /**
     * @return the operando1
     */


    /**
     * @param operando1 the operando1 to set
     */


    /**
     * @return the operando2
     */
   

    /**
     * @param operando2 the operando2 to set
     */
  
    /**
     * @return the operacion
     */
    public String getOperacion() {
        return operacion;
    }

    /**
     * @param operacion the operacion to set
     */
    public void setOperacion(String operacion) {
        this.operacion = operacion;
    }

    /**
     * @return the resultado
     */
   
    public ArrayList getListaOpciones(){
     ArrayList lista=new ArrayList();
     lista.add(new SelectItem("suma","Suma"));
     lista.add(new SelectItem("resta","Resta"));
     lista.add(new SelectItem("producto","Producto"));
     return lista;
    }
}
