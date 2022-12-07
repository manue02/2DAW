import java.sql.*;
public class Empleados {
public static Connection miConexion;

private ResultSet rsEmpleados;
    public Empleados() {
        miConexion=MySQL_Util.Conectar("localhost", "root", "","tablasOracle");
    }

    /**
     * @return the rsEmpleados
     */
    public ResultSet getRsEmpleados() {
       String miSelect="SELECT empno,ename,sal,job,mgr,deptno FROM emp order by ename";
       rsEmpleados=MySQL_Util.Sel_Consulta(miConexion, miSelect);
       return rsEmpleados;
    }

    /**
     * @param rsEmpleados the rsEmpleados to set
     */
    public void setRsEmpleados(ResultSet rsEmpleados) {
        this.rsEmpleados = rsEmpleados;
    }

  
   
}
