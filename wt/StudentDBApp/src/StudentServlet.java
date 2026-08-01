import java.io.*;
import java.sql.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class StudentServlet extends HttpServlet
{
    protected void doPost(HttpServletRequest request,
                          HttpServletResponse response)
            throws ServletException, IOException
    {
        response.setContentType("text/html");

        PrintWriter out = response.getWriter();

        String id = request.getParameter("id");
        String name = request.getParameter("name");
        String branch = request.getParameter("branch");

        try
        {
            Class.forName("com.mysql.cj.jdbc.Driver");

            Connection con = DriverManager.getConnection(
                    "jdbc:mysql://localhost:3306/college",
                    "root",
                    "");

            PreparedStatement ps = con.prepareStatement(
                    "INSERT INTO student VALUES(?,?,?)");

            ps.setInt(1, Integer.parseInt(id));
            ps.setString(2, name);
            ps.setString(3, branch);

            ps.executeUpdate();

            out.println("<html>");
            out.println("<body>");
            out.println("<h2>Student Record Inserted Successfully</h2>");
            out.println("</body>");
            out.println("</html>");

            con.close();
        }
        catch(Exception e)
        {
            out.println(e);
        }

        out.close();
    }
}