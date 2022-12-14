import java.sql.*;
import java.util.ArrayList;
import javax.faces.model.SelectItem;
public class Empleados {
private static Connection miConexion;
private ResultSet rsEmpleados;
private String Indice;
private String mensaje="Hola a todos";
    public Empleados() {
        miConexion=MySQL_Util.Conectar("localhost", "root", "","tipo4");
    }

    /**
     * @return the rsEmpleados
     */
    public ResultSet getRsEmpleados() {
        String miSelect="SELECT `nombre_pref` FROM `preferido`";
       
       
       rsEmpleados=MySQL_Util.Sel_Consulta(miConexion, miSelect);
       return rsEmpleados;
    }

    /**
     * @param rsEmpleados the rsEmpleados to set
     */
    public void setRsEmpleados(ResultSet rsEmpleados) {
        this.rsEmpleados = rsEmpleados;
    }

    /**
     * @return the ndep
     */
    public String getIndice() {
        return Indice;
    }

    /**
     * @param ndep the ndep to set
     */
    public void setIndice(String Indice) {
        this.Indice = Indice;
    }

    /**
     * @return the mensaje
     */
    public String getMensaje() {
         
        return mensaje;
    }

    /**
     * @param mensaje the mensaje to set
     */
    public void setMensaje(String mensaje) {
        this.mensaje = mensaje;
    }

    public ArrayList  getListaDepartamentos(){
    ArrayList lista=new ArrayList();
    String cadSql="SELECT encuesta.nombre as Cliente FROM encuesta WHERE true AND encuesta.consumeMas IS NULL";
    try{
        Statement instruccion=miConexion.createStatement();
        ResultSet rsDept=instruccion.executeQuery(cadSql);
        while (rsDept.next()){
            lista.add(new SelectItem(rsDept.getString("Cliente")));
        }
        rsDept.close();
        instruccion.close();
    }
    catch (Exception ex){
        mensaje="error";
    }

    return lista;

}
    
       public ArrayList  getListaPlatos(){
    ArrayList lista=new ArrayList();
    String cadSql="SELECT nombre_pref FROM preferido";
    try{
        Statement instruccion=miConexion.createStatement();
        ResultSet rsDept=instruccion.executeQuery(cadSql);
        while (rsDept.next()){
            lista.add(new SelectItem(rsDept.getString("nombre_pref")));
        }
        rsDept.close();
        instruccion.close();
    }
    catch (Exception ex){
        mensaje="error";
    }

    return lista;

}
}
