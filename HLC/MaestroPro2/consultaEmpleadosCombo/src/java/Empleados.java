import java.sql.*;
import java.util.ArrayList;
import javax.faces.model.SelectItem;
public class Empleados {
private static Connection miConexion;
private ResultSet rsEmpleados;
private String ndep;
private String orden="empno";
private String mensaje="Hola a todos";
    public Empleados() {
        miConexion=MySQL_Util.Conectar("localhost", "root", "","tablasOracle");
    }

    /**
     * @return the rsEmpleados
     */
    public ResultSet getRsEmpleados() {
        String miSelect="SELECT empno,ename,sal FROM emp ";
       miSelect+=" WHERE deptno="+ndep+" ORDER BY "+orden;
       
       
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
    public String getNdep() {
        return ndep;
    }

    /**
     * @param ndep the ndep to set
     */
    public void setNdep(String ndep) {
        this.ndep = ndep;
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

    /**
     * @return the orden
     */
    public String getOrden() {
        return orden;
    }

    /**
     * @param orden the orden to set
     */
    public void setOrden(String orden) {
        this.orden = orden;
    }
    public ArrayList  getListaDepartamentos(){
    ArrayList lista=new ArrayList();
    String cadSql="SELECT DEPTNO,DNAME FROM DEPT ORDER BY DNAME";
    try{
        Statement instruccion=miConexion.createStatement();
        ResultSet rsDept=instruccion.executeQuery(cadSql);
        while (rsDept.next()){
            lista.add(new SelectItem(rsDept.getString("DEPTNO"),
                    rsDept.getString("DNAME")));
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
