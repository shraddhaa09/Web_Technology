import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class NameServlet extends HttpServlet
{
    protected void doPost(HttpServletRequest request,
                          HttpServletResponse response)
            throws ServletException, IOException
    {
        response.setContentType("text/html");

        PrintWriter out = response.getWriter();

        String firstName = request.getParameter("firstName");

        out.println("<!DOCTYPE html>");
        out.println("<html>");
        out.println("<head>");
        out.println("<title>Welcome</title>");
        out.println("</head>");
        out.println("<body>");

        out.println("<h1>Hello " + firstName + "!</h1>");
        out.println("<h2>Welcome to Servlets!</h2>");

        out.println("</body>");
        out.println("</html>");

        out.close();
    }
}