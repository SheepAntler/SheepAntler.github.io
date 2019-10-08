/** This is the main method for Lawn-A-Thon's client processing application.
 *  It will instantiate a new ProcessReports object and call its run() method.
 *
 *  @author Elspeth Stalter-Clouse
 */
public class LawnAThonLauncher {
    /** Here's the main method
     *
     *  @param args
     */
    public static void main(String[] args) {
        // instantiate a new ProcessReports object
        ProcessReports report = new ProcessReports();

        // call the run() method
        report.run();
    }
}
