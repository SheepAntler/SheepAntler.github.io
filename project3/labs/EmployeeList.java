import java.util.*;

/** This class will create and instantiate an ArrayList instance variable,
 *  populate it with Employee objects, loops through the ArrayList and
 *  outputs the Employee infomration to the terminal window.
 *
 *  @author Elspeth Stalter-Clouse
 */
public class EmployeeList {
    // create an ArrayList instance variable
    private ArrayList<Employee> employees;

    /** This is the run() method, which will instantiate/populate the
     *  employees ArrayList, set-and-get each Employee object's data,
     *  and output that information.
     */
    public void run() {
        // instantiate the ArrayList
        employees = new ArrayList<Employee>();

        // set information for 5 employees
        Employee employee1 = new Employee();
        employee1.setFirstName("Alan");
        employee1.setLastName("Turing");
        employee1.setEmployeeId(673);
        employee1.setDepartment("IT");
        employees.add(employee1);

        Employee employee2 = new Employee();
        employee2.setFirstName("Mister");
        employee2.setLastName("Moneybags");
        employee2.setEmployeeId(123);
        employee2.setDepartment("Accounting");
        employees.add(employee2);

        Employee employee3 = new Employee();
        employee3.setFirstName("Mary");
        employee3.setLastName("Kay");
        employee3.setEmployeeId(884);
        employee3.setDepartment("Marketing");
        employees.add(employee3);

        Employee employee4 = new Employee();
        employee4.setFirstName("Zachary");
        employee4.setLastName("Clouse");
        employee4.setEmployeeId(420);
        employee4.setDepartment("Data Management");
        employees.add(employee4);

        Employee employee5 = new Employee();
        employee5.setFirstName("Christine");
        employee5.setLastName("Lagarde");
        employee5.setEmployeeId(999);
        employee5.setDepartment("Finance");
        employees.add(employee5);

        // make the output look pretty
        System.out.println();

        // use a for loop to output each employee's information
        for (Employee employee : employees) {
            System.out.println(employee.display());
        }
    }
}
