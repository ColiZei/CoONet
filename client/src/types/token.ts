import { JwtPayload } from "jwt-decode";

export interface ApiJwtPayload extends JwtPayload {
  username: string;
  roles: string[];
  exp: number;
}
