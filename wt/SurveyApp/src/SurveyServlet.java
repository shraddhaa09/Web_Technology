import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class SurveyServlet extends HttpServlet
{
    static int dog = 0;
    static int cat = 0;
    static int bird = 0;
    static int snake = 0;
    static int none = 0;

    protected void doPost(HttpServletRequest request,
                          HttpServletResponse response)
            throws ServletException, IOException
    {
        response.setContentType("text/html");

        PrintWriter out = response.getWriter();

        String animal = request.getParameter("animal");

        if(animal != null)
        {
            if(animal.equals("Dog"))
                dog++;
            else if(animal.equals("Cat"))
                cat++;
            else if(animal.equals("Bird"))
                bird++;
            else if(animal.equals("Snake"))
                snake++;
            else if(animal.equals("None"))
                none++;
        }

        int total = dog + cat + bird + snake + none;

        double dogPer = total==0 ? 0 : dog*100.0/total;
        double catPer = total==0 ? 0 : cat*100.0/total;
        double birdPer = total==0 ? 0 : bird*100.0/total;
        double snakePer = total==0 ? 0 : snake*100.0/total;
        double nonePer = total==0 ? 0 : none*100.0/total;

        out.println("<html>");
        out.println("<head>");
        out.println("<title>Survey Result</title>");
        out.println("</head>");
        out.println("<body>");

        out.println("<h2>Thank you for participating.</h2>");

        out.println("<h3>Results</h3>");

        out.printf("Dog : %.2f%% &nbsp;&nbsp; responses : %d<br>",dogPer,dog);
        out.printf("Cat : %.2f%% &nbsp;&nbsp; responses : %d<br>",catPer,cat);
        out.printf("Bird : %.2f%% &nbsp;&nbsp; responses : %d<br>",birdPer,bird);
        out.printf("Snake : %.2f%% &nbsp;&nbsp; responses : %d<br>",snakePer,snake);
        out.printf("None : %.2f%% &nbsp;&nbsp; responses : %d<br>",nonePer,none);

        out.println("<br>");

        out.println("Total responses : " + total);

        out.println("<br><br>");

        out.println("<a href='survey.html'>Vote Again</a>");

        out.println("</body>");
        out.println("</html>");

        out.close();
    }
}