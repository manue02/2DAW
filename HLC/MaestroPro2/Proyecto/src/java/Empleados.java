import java.sql.*;
import java.util.ArrayList;
import javax.faces.model.SelectItem;
public class Empleados {
private static Connection miConexion;
private String idEncuesta;
private String idPlatos;
private String mensaje="Hola a todos";
    public Empleados() {
        miConexion=MySQL_Util.Conectar("localhost", "root", "","tipo4");
    }

   
   
    public String getMensaje() {
         
        return mensaje;
    }

    
    public void setMensaje(String mensaje) {
        this.mensaje = mensaje;
    }

       

       public ArrayList  getListaDepartamentos(){
    ArrayList lista=new ArrayList();
       String cadSql="SELECT id_encuesta , nombre  FROM encuesta WHERE true AND consumeMas IS NULL";
    try{
        Statement instruccion=miConexion.createStatement();
        ResultSet rsDept=instruccion.executeQuery(cadSql);
        while (rsDept.next()){
             lista.add(new SelectItem(rsDept.getString("id_encuesta"),
                    rsDept.getString("nombre")));
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
    String cadSql="SELECT id_preferido , nombre_pref FROM preferido";
    try{
        Statement instruccion=miConexion.createStatement();
        ResultSet rsDept=instruccion.executeQuery(cadSql);
        while (rsDept.next()){
             lista.add(new SelectItem(rsDept.getString("id_preferido"),
                    rsDept.getString("nombre_pref")));
        }
        rsDept.close();
        instruccion.close();
    }
    catch (Exception ex){
        mensaje="error";
    }

    return lista;

}
     
     public String subirDatos(){
    String cadSql="UPDATE encuesta SET id_preferido = " + getIdPlatos() + " WHERE id_encuesta = " + getIdEncuesta();
    MySQL_Util.Ej_ConsultaAccion(miConexion, cadSql);

    return "index.jsp";
}
     
    

    /**
     * @return the idEncuesta
     */
    public String getIdEncuesta() {
        return idEncuesta;
    }

    /**
     * @param idEncuesta the idEncuesta to set
     */
    public void setIdEncuesta(String idEncuesta) {
        this.idEncuesta = idEncuesta;
    }

    /**
     * @return the idPlatos
     */
    public String getIdPlatos() {
        return idPlatos;
    }

    /**
     * @param idPlatos the idPlatos to set
     */
    public void setIdPlatos(String idPlatos) {
        this.idPlatos = idPlatos;
    }

   
   
     
}
