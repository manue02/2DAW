
import java.util.ArrayList;
import java.sql.ResultSet;
import java.sql.SQLException;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author alumno
 */
public class Nuevo {

private String nombre;
private String sueldo;
private String numJefe;
private String numDepartamento;
private String oficio;
private String mensaje;

    public Nuevo() {
        numDepartamento=10+"";
    }
     
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
     * @return the sueldo
     */
    public String getSueldo() {
        return sueldo;
    }

    /**
     * @param sueldo the sueldo to set
     */
    public void setSueldo(String sueldo) {
        this.sueldo = sueldo;
    }

    /**
     * @return the numJefe
     */
    public String getNumJefe() {
        return numJefe;
    }

    /**
     * @param numJefe the numJefe to set
     */
    public void setNumJefe(String numJefe) {
        this.numJefe = numJefe;
    }

    /**
     * @return the numDepartamento
     */
    public String getNumDepartamento() {
        return numDepartamento;
    }

    /**
     * @param numDepartamento the numDepartamento to set
     */
    public void setNumDepartamento(String numDepartamento) {
        this.numDepartamento = numDepartamento;
    }

    /**
     * @return the oficio
     */
    public String getOficio() {
        return oficio;
    }

    /**
     * @param oficio the oficio to set
     */
    public void setOficio(String oficio) {
        this.oficio = oficio;
    }
    public ArrayList  getListaDepartamentos(){
    ArrayList listaDept=new ArrayList();
    String cadSql="SELECT DEPTNO as id,DNAME as nombre FROM DEPT ORDER BY nombre";
    listaDept=MySQL_Util.Llenar_Lista(Empleados.miConexion,cadSql);
    return listaDept;

}
    public ArrayList  getListaOficios(){
    ArrayList listaOficios=new ArrayList();
    String cadSql="SELECT distinct job as id,job as nombre FROM emp ORDER BY nombre";
    listaOficios=MySQL_Util.Llenar_Lista(Empleados.miConexion,cadSql);
    return listaOficios;

}
    public ArrayList  getListaJefes(){
    ArrayList listaJefes=new ArrayList();
    String cadSql="SELECT empno as id,ename as nombre FROM emp ORDER BY nombre";
    listaJefes=MySQL_Util.Llenar_Lista(Empleados.miConexion,cadSql);
    return listaJefes;

}
    public String grabarEmpleado() throws SQLException{
    Integer numeroEmpleado;
    ResultSet rsNumero;
    String cadConsulta="SELECT MAX(EMPNO)+10 AS numero FROM EMP";
    rsNumero=MySQL_Util.Sel_Consulta(Empleados.miConexion, cadConsulta);
    try{
    rsNumero.next();
    numeroEmpleado=rsNumero.getInt("numero");}
    catch (SQLException ex) {
        mensaje=ex.toString();
    return "index";
    }   
    String cadenaInsert="INSERT INTO emp(EMPNO,ENAME,MGR,JOB,SAL,DEPTNO)";
    cadenaInsert+=" VALUES("+numeroEmpleado+",'"+nombre+"',";
    cadenaInsert+=numJefe+",'"+oficio+"',"+sueldo+","+numDepartamento+")";
    MySQL_Util.Ej_ConsultaAccion(Empleados.miConexion, cadenaInsert);
    //mensaje=cadenaInsert;
    return "mostrarDatos";
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
}
