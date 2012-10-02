package Entities;

import java.io.Serializable;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;
import javax.validation.constraints.Size;
import javax.xml.bind.annotation.XmlRootElement;

/**
 *
 * @author Gulshan Bhaugeerothee <arvesh9@gmail.com>
 */
@Entity
@Table(name = "tbl_student")
@XmlRootElement
@NamedQueries({
  @NamedQuery(name = "TblStudent.findAll", query = "SELECT t FROM TblStudent t"),
  @NamedQuery(name = "TblStudent.findByStudentId", query = "SELECT t FROM TblStudent t WHERE t.studentId = :studentId"),
  @NamedQuery(name = "TblStudent.findByStudentFname", query = "SELECT t FROM TblStudent t WHERE t.studentFname = :studentFname"),
  @NamedQuery(name = "TblStudent.findByStudentSname", query = "SELECT t FROM TblStudent t WHERE t.studentSname = :studentSname")})
public class TblStudent implements Serializable {
  private static final long serialVersionUID = 1L;
  @Id
  @GeneratedValue(strategy = GenerationType.IDENTITY)
  @Basic(optional = false)
  @Column(name = "student_id")
  private Integer studentId;
  @Size(max = 255)
  @Column(name = "student_fname")
  private String studentFname;
  @Size(max = 255)
  @Column(name = "student_sname")
  private String studentSname;

  public TblStudent() {
  }

  public TblStudent(Integer studentId) {
    this.studentId = studentId;
  }

  public Integer getStudentId() {
    return studentId;
  }

  public void setStudentId(Integer studentId) {
    this.studentId = studentId;
  }

  public String getStudentFname() {
    return studentFname;
  }

  public void setStudentFname(String studentFname) {
    this.studentFname = studentFname;
  }

  public String getStudentSname() {
    return studentSname;
  }

  public void setStudentSname(String studentSname) {
    this.studentSname = studentSname;
  }

  @Override
  public int hashCode() {
    int hash = 0;
    hash += (studentId != null ? studentId.hashCode() : 0);
    return hash;
  }

  @Override
  public boolean equals(Object object) {
    // TODO: Warning - this method won't work in the case the id fields are not set
    if (!(object instanceof TblStudent)) {
      return false;
    }
    TblStudent other = (TblStudent) object;
    if ((this.studentId == null && other.studentId != null) || (this.studentId != null && !this.studentId.equals(other.studentId))) {
      return false;
    }
    return true;
  }

  @Override
  public String toString() {
    return "Entities.TblStudent[ studentId=" + studentId + " ]";
  }

}
