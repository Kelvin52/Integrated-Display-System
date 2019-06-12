///*
// * To change this license header, choose License Headers in Project Properties.
// * To change this template file, choose Tools | Templates
// * and open the template in the editor.
// */
//package webserver;
//
///**
// *
// * @author xmt6676
// */
//public class StreamingJsonResultSetExtractor implements ResultSetExtractor<Void> {
// 
//  private final OutputStream os;
// 
//  /**
//   * @param os the OutputStream to stream the JSON to
//   */
//  public StreamingJsonResultSetExtractor(final OutputStream os) {
//    this.os = os;
//  }
// 
//  @Override
//  public Void extractData(final ResultSet rs) {
//    final var objectMapper = new ObjectMapper();
//    try (var jg = objectMapper.getFactory().createGenerator(
//                  os, JsonEncoding.UTF8)) {
//      writeResultSetToJson(rs, jg);
//      jg.flush();
//    } catch (IOException | SQLException e) {
//      throw new RuntimeException(e);
//    }
//    return null;
//  }
// 
//  private static void writeResultSetToJson(final ResultSet rs,
//                            final JsonGenerator jg)
//                            throws SQLException, IOException {
//    final var rsmd = rs.getMetaData();
//    final var columnCount = rsmd.getColumnCount();
//    jg.writeStartArray();
//    while (rs.next()) {
//      jg.writeStartObject();
//      for (var i = 1; i <= columnCount; i++) {
//        jg.writeObjectField(rsmd.getColumnName(i), rs.getObject(i));
//      }
//      jg.writeEndObject();
//    }
//    jg.writeEndArray();
//  }
//}
