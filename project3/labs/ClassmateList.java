// import the java.util package
import java.util.*;

/** This class is for practicing with ArrayLists. It will create an ArrayList
 *  of students, populate that array with names (Strings), and print the names
 *  to the terminal window.
 *
 *  @author Elspeth Stalter-Clouse
 */
public class ClassmateList {
    // create an ArrayList object
    ArrayList<String> students;

    /** This is the run() method, which will instantiate the ArrayList, add
     *  student names to it, print them to the terminal window, remove a
     *  name, and reprint the edited list.
     */
    public void run() {
        // instantiate the ArrayList
        students = new ArrayList<String>();

        // add student names to the array
        String student1 = "Junie B. Jones";
        students.add(student1);

        String student2 = "Susan B. Anthony";
        students.add(student2);

        String student3 = "Lyndon B. Johnson";
        students.add(student3);

        String student4 = "Rimi B. Chatterjee";
        students.add(student4);

        String student5 = "Anni B. Sweet";
        students.add(student5);

        // output the ArrayList with System.out.println
        System.out.println();
        System.out.println("ClassmateList output using System.out.println(): ");
        System.out.println(students);

        // output the ArrayList with a for loop
        System.out.println();
        System.out.println("ClassmateList output using a for loop: ");
        for (String student : students) {
            System.out.println(student);
        }

        // remove the name from the middle of the ArrayList
        students.remove(student3);

        // output the ArrayList again
        System.out.println();
        System.out.println("TTFN, LBJ!");
        System.out.println(students);

    }
}
